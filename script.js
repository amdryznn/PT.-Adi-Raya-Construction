const slider = document.querySelector('.slide-track');
        const animationDuration = 5000; // Set the animation duration in milliseconds
        const slideWidth = 250; // Set the width of each slide

        function moveSlider() {
            const totalSlides = document.querySelectorAll('.single-case-studies').length;
            const totalWidth = slideWidth * totalSlides;
            const cloneSlides = slider.innerHTML; // Clone the HTML content of the slider
            slider.innerHTML += cloneSlides; // Duplicate the slides at the end of the track

            let startTime;

            function animate(timestamp) {
                if (!startTime) {
                    startTime = timestamp;
                }

                const elapsedTime = timestamp - startTime;
                const progress = elapsedTime / animationDuration;
                const newPosition = -slideWidth * progress;

                slider.style.transform = `translateX(${newPosition}px)`;

                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    // Reset to the initial position
                    slider.style.transform = `translateX(0)`;
                    startTime = null;

                    // Trigger the next animation frame
                    requestAnimationFrame(moveSlider);
                }
            }

            requestAnimationFrame(animate);
        }

        moveSlider();