import api from "./api";

export default {
    getSlotsByDate(date) {
        return api.get(`slots/${date}`)
    }
}