export class Timer {
    constructor() {
        this.settings = {
            work: 25 * 60,
            shortBreak: 5 * 60,
            longBreak: 15 * 60
        };
        this.timeLeft = this.settings.work;
        this.isRunning = false;
        this.currentMode = 'Work';
        this.isWorkMode = true;
        this.sessionCount = 0;
        this.interval = null;
    }

    start() {
        if (!this.isRunning) {
            this.isRunning = true;
            this.interval = setInterval(() => this.tick(), 1000);
        }
    }

    pause() {
        this.isRunning = false;
        clearInterval(this.interval);
    }

    reset() {
        this.pause();
        this.timeLeft = this.settings.work;
        this.isWorkMode = true;
        this.currentMode = 'Work';
        this.sessionCount = 0;
    }

    tick() {
        if (this.timeLeft > 0) {
            this.timeLeft--;
        } else {
            this.handleTimerComplete();
        }
    }

    handleTimerComplete() {
        if (this.isWorkMode) {
            this.sessionCount++;
            if (this.sessionCount % 4 === 0) {
                this.setMode('longBreak');
            } else {
                this.setMode('shortBreak');
            }
        } else {
            this.setMode('work');
        }
    }

    setMode(mode) {
        this.pause();
        switch(mode) {
            case 'work':
                this.timeLeft = this.settings.work;
                this.currentMode = 'Work';
                this.isWorkMode = true;
                break;
            case 'shortBreak':
                this.timeLeft = this.settings.shortBreak;
                this.currentMode = 'Short Break';
                this.isWorkMode = false;
                break;
            case 'longBreak':
                this.timeLeft = this.settings.longBreak;
                this.currentMode = 'Long Break';
                this.isWorkMode = false;
                break;
        }
    }
}