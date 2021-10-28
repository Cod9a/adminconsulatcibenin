export default (indexUrl) => ({
    waitingQueueItems: [],
    init() {
        this.fetchData();
    },
    fetchData() {
        axios.get(`${indexUrl}`).then((result) => {
            this.waitingQueueItems = result.data.data;
        });
    },
});
