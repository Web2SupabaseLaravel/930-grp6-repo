import './styles/main.css';
import { Timer } from './modules/timer.js';
import { UI } from './modules/ui.js';
import { Notifications } from './modules/notifications.js';

document.addEventListener('DOMContentLoaded', () => {
    const timer = new Timer();
    const notifications = new Notifications();
    const ui = new UI(timer, notifications);

    // Update UI every second
    setInterval(() => {
        ui.update();
    }, 1000);
});