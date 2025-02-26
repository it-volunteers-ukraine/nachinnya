
// basic motion without years:

// const balls = document.querySelectorAll('[class*="history-section-block-module__ball-container"]');
// const trajectories = document.querySelectorAll('[class*="history-section-block-module__path-container"]');

// gsap.registerPlugin(MotionPathPlugin);

// balls.forEach((ball, index) => {
//     const trajectory = trajectories[index]?.querySelector("path");

//     if (trajectory) {
//         gsap.to(ball.querySelector("svg"), {
//             motionPath: {
//                 path: trajectory,
//                 align: trajectory,
//                 autoRotate: true,
//                 alignOrigin: [0.5, 0.5]
//             },
//             duration: 15,
//             repeat: -1,
//             ease: "power1.inOut"
//         });
//     }
// });



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
gsap.registerPlugin(MotionPathPlugin, ScrollTrigger);

const ball = document.querySelector('[class*="history-section-block-module__ball-container"] svg');
const trajectory = document.querySelector('[class*="history-section-block-module__path-container"] path');
const years = Array.from(document.querySelectorAll('.year1, .year2, .year3, .year4'));

if (ball && trajectory && years.length) {
    let path = MotionPathPlugin.getRawPath(trajectory)[0];

    let positions = years.map(year => {
        let rect = year.getBoundingClientRect();
        let yPosition = rect.top + window.scrollY;

        return path.reduce((prev, curr) => {
            return Math.abs(curr[1] - yPosition) < Math.abs(prev[1] - yPosition) ? curr : prev;
        });
    });

    let tl = gsap.timeline();

    years.forEach((year, i) => {
        ScrollTrigger.create({
            trigger: year,
            start: "bottom bottom",
            onEnter: () => {
                gsap.to(ball, {
                    motionPath: {
                        path: trajectory,
                        align: trajectory,
                        alignOrigin: [0.5, 0.5],
                        autoRotate: true,
                        start: i / positions.length,
                        end: (i + 1) / positions.length
                    },
                    duration: 2,
                    ease: "power1.inOut"
                });
            }
        });
    });
}




