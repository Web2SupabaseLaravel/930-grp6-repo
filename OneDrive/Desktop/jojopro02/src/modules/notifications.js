export class Notifications {
    constructor() {
        // Using a simple beep sound for notifications
        this.sound = new Audio('https://assets.mixkit.co/active_storage/sfx/2568/2568-preview.mp3');
        this.requestPermission();
    }

    playNotification() {
        // Reset sound to beginning and play
        this.sound.currentTime = 0;
        this.sound.play().catch(error => {
            console.log('Error playing notification:', error);
        });
    }

    requestPermission() {
        if ('Notification' in window) {
            Notification.requestPermission().then(permission => {
                if (permission === 'granted') {
                    console.log('Notification permission granted');
                }
            });
        }
    }

    sendNotification(title, options = {}) {
        // Try to play sound first
        this.playNotification();

        // Then show notification if permitted
        if ('Notification' in window && Notification.permission === 'granted') {
            const defaultOptions = {
                icon: 'https://pomofocus.io/favicon.ico',
                body: 'Time is up!',
                ...options
            };
            new Notification(title, defaultOptions);
        }
    }
}