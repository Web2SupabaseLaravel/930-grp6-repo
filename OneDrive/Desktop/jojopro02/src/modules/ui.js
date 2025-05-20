export class UI {
    constructor(timer, notifications) {
        this.timer = timer;
        this.notifications = notifications;
        this.tasks = [];
        this.initializeElements();
        this.bindEvents();
    }

    initializeElements() {
        this.minutesDisplay = document.getElementById('minutes');
        this.secondsDisplay = document.getElementById('seconds');
        this.timerControl = document.getElementById('timer-control');
        this.sessionCount = document.getElementById('sessionCount');
        this.modeBtns = document.querySelectorAll('.mode-btn');
        this.timerLabel = document.querySelector('.timer-label');
        this.timerMessage = document.querySelector('.timer-message');
        this.tasksContainer = document.getElementById('tasks-list');
        this.addTaskBtn = document.querySelector('.add-task-btn');
    }

    bindEvents() {
        this.timerControl.addEventListener('click', () => {
            if (this.timer.isRunning) {
                this.timer.pause();
                this.timerControl.textContent = 'START';
            } else {
                this.timer.start();
                this.timerControl.textContent = 'PAUSE';
            }
        });

        this.modeBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                this.modeBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                switch(index) {
                    case 0: // Pomodoro
                        this.timer.setMode('work');
                        break;
                    case 1: // Short Break
                        this.timer.setMode('shortBreak');
                        break;
                    case 2: // Long Break
                        this.timer.setMode('longBreak');
                        break;
                }
            });
        });
    }

    update() {
        const minutes = Math.floor(this.timer.timeLeft / 60);
        const seconds = this.timer.timeLeft % 60;

        this.minutesDisplay.textContent = minutes.toString().padStart(2, '0');
        this.secondsDisplay.textContent = seconds.toString().padStart(2, '0');
        this.sessionCount.textContent = `${this.timer.sessionCount}/4`;
        
        // Update timer label and message
        this.timerLabel.textContent = this.timer.currentMode;
        this.timerMessage.textContent = this.timer.isWorkMode ? 'Time to focus!' : 'Time for a break!';
        
        // Update document title
        document.title = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')} - ${this.timer.currentMode}`;
    }
    saveTask(taskText, taskElement) {
        if (taskText.trim()) {
            const task = {
                id: Date.now(),
                text: taskText,
                completed: false
            };
            this.tasks.push(task);
            
            taskElement.innerHTML = `
                <div class="task-content">
                    <span class="task-text">${taskText}</span>
                    <div class="task-actions">
                        <button class="edit-task">Edit</button>
                        <button class="delete-task">Delete</button>
                    </div>
                </div>
            `;

            const deleteBtn = taskElement.querySelector('.delete-task');
            deleteBtn.addEventListener('click', () => {
                this.tasks = this.tasks.filter(t => t.id !== task.id);
                taskElement.remove();
            });
        } else {
            taskElement.remove();
        }
    }
    saveTask(text, formElement) {
        if (text.trim()) {
            const taskElement = document.createElement('div');
            taskElement.className = 'task-item';
            taskElement.innerHTML = `
                <div class="task-content">
                    <span class="task-text">${text}</span>
                    <div class="task-actions">
                        <button class="edit-task">Edit</button>
                        <button class="delete-task">Delete</button>
                    </div>
                </div>
            `;
            
            this.tasksContainer.insertBefore(taskElement, formElement);
            formElement.remove();
            
            // Add event listeners for edit and delete
            taskElement.querySelector('.delete-task').addEventListener('click', () => {
                taskElement.remove();
            });
        } else {
            formElement.remove();
        }
    }
}