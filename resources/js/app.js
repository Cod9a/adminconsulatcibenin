require("./bootstrap");

import Alpine from "alpinejs";
import meetingsIndex from "./components/MeetingsIndex";
import demandsIndex from "./components/DemandsIndex";
import { createPopper } from "@popperjs/core";
window.Alpine = Alpine;
window.createPopper = createPopper;
Alpine.data("meetingsIndex", meetingsIndex);
Alpine.data("demandsIndex", demandsIndex);
Alpine.start();
