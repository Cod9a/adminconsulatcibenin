import axios from "axios";

export default (meetingIndexUrl) => ({
    q: "",
    meetings: [],
    prev_link: null,
    next_link: null,
    loading: false,
    deleted: null,
    init() {
        this.fetchData();
    },
    fetchData() {
        this.loading = true;
        axios.get(`${meetingIndexUrl}`).then((result) => {
            this.loading = false;
            this.meetings = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    fetchNext() {
        axios.get(this.next_link).then((result) => {
            this.meetings = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    fetchPrev() {
        axios.get(this.prev_link).then((result) => {
            this.meetings = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    search() {
        axios.get(`${meetingIndexUrl}?q=${this.q}`).then((result) => {
            this.meetings = result.data.data;
            this.prev_link = result.data.prev_page_url;
            this.next_link = result.data.next_page_url;
        });
    },
    setDeleted(meeting) {
        this.deleted = meeting.id;
    },
    sendDeletion() {
        axios.delete(`${meetingIndexUrl}/${this.deleted}`).then((result) => {
            this.fetchData();
            this.deleted = null;
            this.$dispatch("notify", {
                message: "Rendez-vous supprime avec succes",
            });
        });
    },
    cancelDeletion() {
        this.deleted = null;
    },
});
