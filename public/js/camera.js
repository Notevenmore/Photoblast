const video = document.querySelector(".watch-video");
const cameraButton = document.querySelector(".camera-button");
const listPhoto = document.querySelector("section#Photos");
const countdowndisplay = document.getElementById("countdown-display");
let timeDiv = document.querySelector(
    "section#Camera .button .timer-button .time .value"
);

let timeClick = 0;

document
    .querySelector("section#Camera .button .timer-button button")
    .addEventListener("click", () => {
        timeClick++;
        if (timeClick == 3) {
            timeClick = 0;
            timeDiv.innerHTML = 3;
        } else if (timeClick == 2) {
            timeDiv.innerHTML = 10;
        } else if (timeClick == 1) {
            timeDiv.innerHTML = 5;
        }
    });

let autoCapture = document.querySelector(
    "section#Camera .button .autocapture-button .status .value"
);
let auto = false;
let captured = false;

let photoCount = 0;
let videoChunks = [];
let recordedVideoUrl;
let captureInterval;

document
    .querySelector("section#Camera .button .autocapture-button button")
    .addEventListener("click", (e) => {
        if (auto) {
            auto = false;
            autoCapture.innerHTML = "OFF";
        } else {
            auto = true;
            autoCapture.innerHTML = "ON";
            capturePhotoLoop();
        }
    });

async function capturePhotoLoop() {
    while (auto && photoCount < limit) {
        await capturePhotoAndSave();
        if (photoCount < limit) {
            await new Promise(
                (resolve) =>
                    (captureTimeout = setTimeout(
                        resolve,
                        timeDiv.innerHTML * 1500
                    ))
            );
        }
    }
    if (photoCount >= limit) {
        stopRecordingAndDownload();
        auto = false;
        autoCapture.innerHTML = "OFF";
    }
}

// fitur rekam kamera
navigator.mediaDevices
    .getUserMedia({
        video: {
            width: {ideal: 552},
            height: {ideal: 441},
        },
    })
    .then(function (stream) {
        video.srcObject = stream;
        video.play();
        startRecording(stream);
    })
    .catch(function (err) {
        console.log("An error occurred: " + err);
    });

// Tombol kamera diklik
cameraButton.addEventListener("click", function () {
    if (!auto) {
        if (!captured) {
            captured = true;
            if (photoCount < limit) {
                capturePhotoAndSave();
            } else {
                stopRecordingAndDownload();
            }
        }
    }
});

// Function to capture photo and save
function capturePhotoAndSave() {
    let time = timeDiv.innerHTML;
    function countdown() {
        if (time >= 0) {
            setTimeout(() => {
                countdowndisplay.style.display = "flex";
                countdowndisplay.textContent = time;
                time--;
                countdown();
            }, 1000);
        } else {
            countdowndisplay.style.display = "none";
            countdowndisplay.textContent = "";
            afterCountDown();
        }
    }

    function afterCountDown() {
        const canvas = document.createElement("canvas");
        const aspectRatio = 5 / 4;
        const videoWidth = video.videoWidth;
        const videoHeight = video.videoHeight
        const targetWidth = 551;
        const targetHeight = targetWidth / aspectRatio;

        canvas.width = targetWidth;
        canvas.height = targetHeight;
        const ctx = canvas.getContext("2d");

        const videoAspectRatio = videoWidth / videoHeight;
        let sx, sy, sw, sh;
        if (videoAspectRatio > aspectRatio) {
            // Video is wider than target aspect ratio
            sw = canvas.height * aspectRatio;
            sh = canvas.height;
            sx = (canvas.width - sw) / 2;
            sy = 0;
        } else {
            // Video is taller than target aspect ratio
            sw = videoWidth;
            sh = videoHeight / aspectRatio;
            sx = 0;
            sy = (videoHeight - sh) / 2;
        }

        ctx.drawImage(video, sx, sy, sw, sh, 0, 0, targetWidth, targetHeight);
        const dataUrl = canvas.toDataURL("image/png"); // Capture image as PNG
        const base64Data = dataUrl.split(",")[1];

        listPhoto.innerHTML =
            `<div class="photo"><img src="${dataUrl}"></div>` +
            listPhoto.innerHTML;

        let data;
        if (request == "photo") {
            data = {
                name_photo: `photo_${photoCount}.png`,
                data: base64Data,
                email: email,
            };
        } else if (request == "retake") {
            data = {
                name_photo: photoName[photoCount],
                data: base64Data,
                email: email,
            };
        }
        const theData = data;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/save-photo",
            type: "POST",
            data: JSON.stringify(theData),
            contentType: "application/json",
            success: function (response) {
                console.log("Response dari server:", response);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            },
        });
        photoCount++;
        captured = false;
    }
    countdown();
}

// Function to start recording video
function startRecording(stream) {
    const mediaRecorder = new MediaRecorder(stream, { mimeType: "video/webm" });

    mediaRecorder.ondataavailable = function (e) {
        videoChunks.push(e.data);
    };

    mediaRecorder.onstop = function () {
        const videoBlob = new Blob(videoChunks, { type: "video/webm" });
        const formData = new FormData();
        formData.append("video", videoBlob, "recorded_video.webm");
        formData.append("email", email);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/save-video",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
        URL.revokeObjectURL(recordedVideoUrl);
    };

    mediaRecorder.start();
}

// fitur download rekaman, foto
function stopRecordingAndDownload() {
    const videoStream = video.srcObject;
    const tracks = videoStream.getTracks();

    tracks.forEach((track) => track.stop());

    window.location.href = "/listphoto";
}

const template = document.querySelector("section#Photos");
let isDown = false;
let startY;
let scrollTop;

template.addEventListener("mousedown", (e) => {
    isDown = true;
    template.classList.add("active");
    startY = e.pageY - template.offsetTop;
    scrollTop = template.scrollTop;
    console.log("Mouse down: startY =", startY, "scrollTop =", scrollTop);
});

template.addEventListener("mouseleave", () => {
    isDown = false;
    template.classList.remove("active");
    console.log("Mouse leave");
});

template.addEventListener("mouseup", () => {
    isDown = false;
    template.classList.remove("active");
    console.log("Mouse up");
});

template.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const y = e.pageY - template.offsetTop;
    const walk = (y - startY) * 2;
    template.scrollTop = scrollTop - walk;
    console.log(
        "Mouse move: x =",
        y,
        "walk =",
        walk,
        "scrollLeft =",
        template.scrollTop
    );
});
