
const balls = document.querySelectorAll('[class*="history-section-block-module__ball-container"]');
const trajectories = document.querySelectorAll('[class*="history-section-block-module__path-container"]');

gsap.registerPlugin(MotionPathPlugin);

balls.forEach((ball, index) => {
    const trajectory = trajectories[index]?.querySelector("path");

    if (trajectory) {
        gsap.to(ball.querySelector("svg"), {
            motionPath: {
                path: trajectory,
                align: trajectory,
                autoRotate: true,
                alignOrigin: [0.5, 0.5]
            },
            duration: 15,
            repeat: -1,
            ease: "power1.inOut"
        });
    }
});
