
const year2022 = document.getElementById('year2022');
const year2023 = document.getElementById('year2023');
const year2024 = document.getElementById('year2024');
const year2025 = document.getElementById('year2025');
const ball = document.getElementById('ball');

let trajectory;
let animationValues;

const screenWidth = window.innerWidth;

if (screenWidth >= 1920 && document.getElementById('trajectory')) {
    trajectory = document.getElementById('trajectory');
    animationValues = {
        segment1: { start: 0.01, end: 0.26 },
        segment2: { start: 0.26, end: 0.54 },
        segment3: { start: 0.54, end: 0.85 }
    };
} else if (screenWidth < 1920 && screenWidth >= 1440 && document.getElementById('trajectory1440')) {
    trajectory = document.getElementById('trajectory1440');
    animationValues = {
        segment1: { start: 0.015, end: 0.265 },
        segment2: { start: 0.265, end: 0.55 },
        segment3: { start: 0.55, end: 0.82 }
    };
} else if (screenWidth < 1440 && screenWidth >= 768 && document.getElementById('trajectory768')) {
    trajectory = document.getElementById('trajectory768');
    animationValues = {
        segment1: { start: 0, end: 0.24 },
        segment2: { start: 0.24, end: 0.51 },
        segment3: { start: 0.51, end: 0.785 }
    };
} else if (screenWidth < 768 && document.getElementById('trajectory360')) {
    trajectory = document.getElementById('trajectory360');
    animationValues = {
        segment1: { start: 0.1, end: 0.33 },
        segment2: { start: 0.33, end: 0.585 },
        segment3: { start: 0.585, end: 0.885 }
    };
}

if (trajectory) {
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
            start: animationValues.segment1.start,
            end: animationValues.segment1.end
        },
        scrollTrigger: {
            trigger: year2022,
            start: 'top 75%',
            end: 'bottom 5%',
            scrub: true,
            // markers: true,
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
            start: animationValues.segment2.start,
            end: animationValues.segment2.end
        },
        scrollTrigger: {
            trigger: year2023,
            start: 'top 55%',
            end: 'bottom 5%',
            scrub: true,
            // markers: true,
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
            start: animationValues.segment3.start,
            end: animationValues.segment3.end
        },
        scrollTrigger: {
            trigger: year2024,
            start: 'top 55%',
            end: 'bottom 5%',
            scrub: true,
            // markers: true,
        }
    });
} else {
    console.warn("trajectory, trajectory1440, trajectory768 or trajectory360 not found.");
}