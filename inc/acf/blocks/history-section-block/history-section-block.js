
gsap.registerPlugin(MotionPathPlugin);

gsap.to(".ball-container svg", {
    motionPath: {
        path: ".path-container path",
        align: ".path-container path",
        autoRotate: true,
        alignOrigin: [0.5, 0.5]
    },
    duration: 15,
    repeat: -1,
    ease: "power1.inOut"
});