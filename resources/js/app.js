require("./bootstrap");

import Alpine from "alpinejs";
import meetingsIndex from "./components/MeetingsIndex";
window.Alpine = Alpine;
Alpine.data("meetingsIndex", meetingsIndex);
Alpine.start();
