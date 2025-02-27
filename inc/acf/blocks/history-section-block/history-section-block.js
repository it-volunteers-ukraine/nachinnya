
// basic motion:

const year2022 = document.getElementById('year2022');
const year2023 = document.getElementById('year2023');
const year2024 = document.getElementById('year2024');
const year2025 = document.getElementById('year2025');
const point1 = document.querySelector('[class*="history-section-block-module__point1"]');
const point2 = document.querySelector('[class*="history-section-block-module__point2"]');
const point3 = document.querySelector('[class*="history-section-block-module__point3"]');
const point4 = document.querySelector('[class*="history-section-block-module__point4"]');
const ball = document.getElementById('ball');
const trajectory = document.getElementById('trajectory');

gsap.registerPlugin(MotionPathPlugin, ScrollTrigger);

gsap.to(ball, {
    duration: 1.5,
    motionPath: {
        path: trajectory,
        align: trajectory,
        alignOrigin: [0.5, 0.5],
        autoRotate: true,
    },
    repeat: 1,
    scrollTrigger: {
        trigger: year2022,
        endTrigger: point1,
        endTrigger: point4,
        start: 'top center',
        end: 'top center',
        markers: true,
        scrub: true,
    },
});








// -------------------------------------------

// gsap.registerPlugin(MotionPathPlugin, ScrollTrigger);

// const ball = document.querySelector('[class*="history-section-block-module__ball-container"] svg');
// const trajectory = document.querySelector('[class*="history-section-block-module__path-container"] path');
// const years = Array.from(document.querySelectorAll('.year1, .year2, .year3, .year4'));
// const triggerElement = document.querySelector('[class*="history-section-block-module__content-with-animation-wrapper"]');

// if (ball && trajectory && years.length) {
//     let path = MotionPathPlugin.getRawPath(trajectory)[0];

//     let positions = years.map(year => {
//         let rect = year.getBoundingClientRect();
//         let yPosition = rect.top + window.scrollY;

//         return path.reduce((prev, curr) => {
//             return Math.abs(curr[1] - yPosition) < Math.abs(prev[1] - yPosition) ? curr : prev;
//         });
//     });

//     let tl = gsap.timeline({
//         scrollTrigger: {
//             // trigger: triggerElement,
//             start: "top top",
//             end: "bottom bottom",
//             scrub: true,
//             pin: true
//         }
//     });

//     positions.forEach((pos, i) => {
//         tl.to(ball, {
//             motionPath: {
//                 path: trajectory,
//                 align: trajectory,
//                 alignOrigin: [0.5, 0.5],
//                 start: i / positions.length,
//                 end: (i + 1) / positions.length
//             },
//             duration: 1,
//             ease: "none"
//         });
//     });
// }


// -----------------------------------------------
// gsap.registerPlugin(MotionPathPlugin, ScrollTrigger);

// const ball = document.querySelector('[class*="history-section-block-module__ball-container"] svg');
// const trajectory = document.querySelector('[class*="history-section-block-module__path-container"] path');
// const years = Array.from(document.querySelectorAll('.year1, .year2, .year3, .year4'));

// if (ball && trajectory && years.length) {
//     let path = MotionPathPlugin.getRawPath(trajectory)[0];

//     let positions = years.map(year => {
//         let rect = year.getBoundingClientRect();
//         let yPosition = rect.top + window.scrollY;

//         return path.reduce((prev, curr) => {
//             return Math.abs(curr[1] - yPosition) < Math.abs(prev[1] - yPosition) ? curr : prev;
//         });
//     });

//     let tl = gsap.timeline();

//     years.forEach((year, i) => {
//         ScrollTrigger.create({
//             trigger: year,
//             start: "bottom bottom",
//             onEnter: () => {
//                 gsap.to(ball, {
//                     motionPath: {
//                         path: trajectory,
//                         align: trajectory,
//                         alignOrigin: [0.5, 0.5],
//                         autoRotate: true,
//                         start: i / positions.length,
//                         end: (i + 1) / positions.length
//                     },
//                     duration: 2,
//                     ease: "power1.inOut"
//                 });
//             }
//         });
//     });
// }
