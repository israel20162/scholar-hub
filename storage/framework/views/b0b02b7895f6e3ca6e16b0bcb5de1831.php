<div :key=<?php echo e(date('now')); ?> class="flex items-center gap-2">


    <div id="countdown" class="dark:text-white font-bold text-lg">
        Time left: <span id="timer">10:00</span>
    </div>

                                        <button @click="open = true" class="bg-red-600 text-white p-1.5 rounded">Stop
                                            Quiz</button>
                                        <!-- Modal for confirmation -->
                                          <template x-teleport="body">
                                        <div x-show="open"
                                            class="fixed top-0 left-0 w-full h-full flex items-center justify-center"
                                            style="background-color: rgba(0, 0, 0, 0.5);">
                                            <div class="bg-white dark:bg-gray-700 alert-dark p-4 rounded shadow-lg">
                                                <p>Are you sure you want to stop the quiz?</p>
                                                <div class="mt-4 flex justify-end space-x-2">
                                                    <button @click="open = false"
                                                        class="bg-gray-200 dark:bg-indigo-600 dark:text-white p-2 rounded">Cancel</button>
                                                    <button wire:click="stopTimer"
                                                        class="bg-red-600 text-white p-2 rounded">Stop</button>
                                                </div>
                                            </div>
                                        </div>
                                        </template>

    <?php $__env->startPush('scripts'); ?>
        <script>


   const countdownMinutes = <?php echo e($initialMinutes); ?>;

            let currentTime = countdownMinutes * 60;
            const countdownDisplay = document.getElementById('timer');

            function updateCountdown() {
                const minutes = Math.floor(currentTime / 60);
                let seconds = currentTime % 60;

                // Add a leading zero if seconds are less than 10
                seconds = seconds < 10 ? '0' + seconds : seconds;

                countdownDisplay.textContent = `${minutes}:${seconds}`;
                currentTime--;

                // When the timer reaches 0
                if (currentTime < 0) {
                    clearInterval(countdownInterval);
                    // Add any logic you want to happen when the time runs out
                    alert('Time is up!');
                }
            }

            // Update the countdown every second
            const countdownInterval = setInterval(updateCountdown, 1000);



        </script>
    <?php $__env->stopPush(); ?>
</div>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/livewire/timer.blade.php ENDPATH**/ ?>