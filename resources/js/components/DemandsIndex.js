import axios from "axios";

export default (indexUrl) => ({
    q: "",
    demands: [],
    prev_link: null,
    next_link: null,
    selectedDemand: null,
    rejectionModal: false,
    justificationText: "",
    init() {
        this.fetchData();
    },
    fetchData() {
        axios.get(`${indexUrl}`).then((result) => {
            this.demands = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    fetchNext() {
        axios.get(this.next_link).then((result) => {
            this.demands = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    fetchPrev() {
        axios.get(this.prev_link).then((result) => {
            this.demands = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    search() {
        axios.get(`${indexUrl}?q=${this.q}`).then((result) => {
            this.demands = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    setSelectedDemand(demand) {
        this.selectedDemand = demand;
    },
    cancelOutSelectedDemand() {
        this.selectedDemand = null;
    },
    updateStatus(demand, status) {
        if (demand.status === status) return;
        axios
            .put(`${indexUrl}/${demand.id}`, {
                status,
            })
            .then((result) => {
                let selectedDemand = this.demands.filter(
                    (item) => demand.id === item.id
                )[0];
                selectedDemand.status = status;
                this.$dispatch("notify", {
                    message: "Status mis a jour avec succes",
                });
            });
    },
    rejectSelectedDemand() {
        this.rejectionModal = true;
    },
    onRejectionConfirmed() {
        axios
            .put(`${indexUrl}/${this.selectedDemand.id}/reject`, {
                justification: this.justificationText,
            })
            .then((result) => {
                this.fetchData();
                this.rejectionModal = false;
                this.selectedDemand = null;
                this.justificationText = "";
                this.$dispatch("notify", {
                    message: "Demande rejetee avec succes",
                });
            });
    },
    onRejectionCancelled() {
        this.rejectionModal = false;
        this.selectedDemand = null;
    },
});
