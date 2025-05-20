// let currentStepIndex = 0;
// const steps = document.querySelectorAll('.form-step');
// const circles = document.querySelectorAll('.step-circle');
// const lines = document.querySelectorAll('.step-line');

// function updateProgress(stepIndex) {
//     // Update circles
//     circles.forEach((circle, index) => {
//         if (index === stepIndex) {
//             circle.classList.add('step-circle-active');
//         } else {
//             circle.classList.remove('step-circle-active');
//         }
//     });

//     // Update lines
//     lines.forEach((line, index) => {
//         if (index === stepIndex - 1) {
//             line.classList.add('step-line-active');
//         } else {
//             line.classList.remove('step-line-active');
//         }
//     });

//     // Update previous circles and lines
//     circles.forEach((circle, index) => {
//         if (index < stepIndex) {
//             circle.classList.add('step-circle-done');
//         } else {
//             circle.classList.remove('step-circle-done');
//         }
//     });

//     lines.forEach((line, index) => {
//         if (index < stepIndex - 1) {
//             line.classList.add('step-line-done');
//         } else {
//             line.classList.remove('step-line-done');
//         }
//     });
// }

// function nextStep() {
//     const program = document.getElementById('program').value;
//     const semester = document.getElementById('semester').value;

//     if (currentStepIndex === 0 && !program) {
//         Swal.fire({
//             icon: 'warning',
//             title: 'Please select a program',
//             text: 'You need to choose a program before proceeding to the next step.',
//         });
//         return;
//     }

//     if (currentStepIndex === 1 && !semester) {
//         Swal.fire({
//             icon: 'warning',
//             title: 'Please select a semester',
//             text: 'You need to choose a semester before proceeding to the next step.',
//         });
//         return;
//     }

//     if (currentStepIndex < steps.length - 1) {
//         steps[currentStepIndex].classList.remove('form-step-active');
//         currentStepIndex++;
//         steps[currentStepIndex].classList.add('form-step-active');
//         updateProgress(currentStepIndex);
//     }
// }

// function prevStep() {
//     if (currentStepIndex > 0) {
//         steps[currentStepIndex].classList.remove('form-step-active');
//         currentStepIndex--;
//         steps[currentStepIndex].classList.add('form-step-active');
//         updateProgress(currentStepIndex);
//     }
// }

// document.getElementById('form').addEventListener('submit', function(e) {
//     e.preventDefault();
//     // Handle form submission here

//     // Simulate form submission success
//     setTimeout(function() {
//         Swal.fire({
//             icon: 'success',
//             title: 'Form submitted!',
//             text: 'Your form has been successfully submitted.',
//         });
//         // Mark last step as done (blue)
//         circles[steps.length - 1].classList.add('step-circle-done');
//         lines[steps.length - 2].classList.add('step-line-done');
//     }, );
// });
