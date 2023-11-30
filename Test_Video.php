<!DOCTYPE html>
<html>

<head>
    <title>Video Loop</title>
    <style>
        .video-container {
            text-align: center;
            margin-bottom: 20px;
        }

        video {
            display: none;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php
    $videoSources = [
        "https://ethsch.org/videos/jul23hvt3.mp4",
        "https://ethsch.org/videos/jan23hvt5.mp4"
    ];

    echo '<div id="videoContainer">';
    foreach ($videoSources as $index => $videoSource) {
        echo '<video id="video' . $index . '" controls height="300" width="500" preload="metadata">';
        echo '<source src="' . $videoSource . '" type="video/mp4">';
        echo '</video>';
    }
    echo '</div>';
    ?>

    <script>
        const videos = document.querySelectorAll('video');
        let currentIndex = 0;

        function playNextVideo() {
            const currentVideo = videos[currentIndex];
            currentVideo.style.display = 'none';
            currentVideo.pause();
            currentVideo.currentTime = 0;

            currentIndex = (currentIndex + 1) % videos.length;

            const nextVideo = videos[currentIndex];
            nextVideo.style.display = 'block';
            nextVideo.play();
        }

        // Initially, hide all videos except the first one
        videos.forEach((video, index) => {
            if (index !== 0) {
                video.style.display = 'none';
            }
        });

        // Add an event listener to know when each video ends and play the next one
        videos.forEach((video, index) => {
            video.addEventListener('ended', playNextVideo);
        });

        // Play the first video
        videos[currentIndex].style.display = 'block';
        videos[currentIndex].play();
    </script>

</body>

</html>
