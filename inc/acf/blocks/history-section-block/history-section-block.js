
// // basic motion: some works

// const year2022 = document.getElementById('year2022');
// const year2023 = document.getElementById('year2023');
// const year2024 = document.getElementById('year2024');
// const year2025 = document.getElementById('year2025');
// const point1 = document.querySelector('[class*="history-section-block-module__point1"]');
// const point2 = document.querySelector('[class*="history-section-block-module__point2"]');
// const point3 = document.querySelector('[class*="history-section-block-module__point3"]');
// const point4 = document.querySelector('[class*="history-section-block-module__point4"]');
// const ball = document.getElementById('ball');
// const trajectory = document.getElementById('trajectory');

// gsap.registerPlugin(MotionPathPlugin, ScrollTrigger);

// gsap.to(ball, {
//     duration: 1.5,
//     motionPath: {
//         path: trajectory,
//         align: trajectory,
//         alignOrigin: [0.5, 0.5],
//         autoRotate: true,
//     },
//     repeat: 1,
//     scrollTrigger: {
//         trigger: year2022,
//         endTrigger: year2024,
//         start: 'top center',
//         end: 'top center',
//         markers: true,
//         scrub: true,
//     },
// });



// Pravie:

// const year2022 = document.getElementById('year2022');
// const year2023 = document.getElementById('year2023');
// const year2024 = document.getElementById('year2024');
// const year2025 = document.getElementById('year2025');
// const point1 = document.querySelector('[class*="history-section-block-module__point1"]');
// const point2 = document.querySelector('[class*="history-section-block-module__point2"]');
// const point3 = document.querySelector('[class*="history-section-block-module__point3"]');
// const point4 = document.querySelector('[class*="history-section-block-module__point4"]');
// const ball = document.getElementById('ball');
// const trajectory = document.getElementById('trajectory');

// gsap.registerPlugin(MotionPathPlugin, ScrollTrigger);

// // 2022 - 2023
// gsap.to(ball, {
//     duration: 1.5,
//     motionPath: {
//         path: trajectory,
//         align: trajectory,
//         alignOrigin: [0.5, 0.5],
//         autoRotate: true,
//         start: 0,
//         end: 0.33
//     },
//     scrollTrigger: {
//         trigger: year2022,
//         // endTrigger: year2023,
//         start: 'top center',
//         end: 'top 300px',
//         scrub: true,
//         markers: true,
//     }
// });

// // 2023 - 2024
// gsap.to(ball, {
//     duration: 1.5,
//     motionPath: {
//         path: trajectory,
//         align: trajectory,
//         alignOrigin: [0.5, 0.5],
//         autoRotate: true,
//         start: 0.33,
//         end: 0.66
//     },
//     scrollTrigger: {
//         trigger: year2023,
//         // endTrigger: year2024,
//         start: 'top center',
//         end: 'top 350px',
//         scrub: true,
//         markers: true,
//     }
// });

// // 2024 - 2025
// gsap.to(ball, {
//     duration: 1.5,
//     motionPath: {
//         path: trajectory,
//         align: trajectory,
//         alignOrigin: [0.5, 0.5],
//         autoRotate: true,
//         start: 0.66,
//         end: 1
//     },
//     scrollTrigger: {
//         trigger: year2024,
//         // endTrigger: year2025,
//         start: 'top center',
//         end: 'top 400px',
//         scrub: true,
//         markers: true,
//     }
// });



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

// 2022 - 2023
gsap.to(ball, {
    duration: 1.5,
    ease: "power1.inOut",
    motionPath: {
        path: trajectory,
        align: trajectory,
        alignOrigin: [0.5, 0.5],
        autoRotate: true,
        start: 0,
        end: 0.24
    },
    scrollTrigger: {
        trigger: year2022,
        // endTrigger: year2023,
        start: 'top center',
        end: 'top 400px',
        scrub: true,
        markers: true,
    }
});

// 2023 - 2024
gsap.to(ball, {
    duration: 1.5,
    ease: "power1.inOut",
    motionPath: {
        path: trajectory,
        align: trajectory,
        alignOrigin: [0.5, 0.5],
        autoRotate: true,
        start: 0.24,
        end: 0.528
    },
    scrollTrigger: {
        trigger: year2023,
        // endTrigger: year2024,
        start: 'top center',
        end: 'top 450px',
        scrub: true,
        markers: true,
    }
});

// 2024 - 2025
gsap.to(ball, {
    duration: 1.5,
    ease: "power1.inOut",
    motionPath: {
        path: trajectory,
        align: trajectory,
        alignOrigin: [0.5, 0.5],
        autoRotate: true,
        start: 0.528,
        end: 0.82
    },
    scrollTrigger: {
        trigger: year2024,
        // endTrigger: year2025,
        start: 'top center',
        end: 'top 500px',
        scrub: true,
        markers: true,
    }
});