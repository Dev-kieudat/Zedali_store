<?php include_once VIEW . "Admin/base/header.php" ?>
    <style>
        /* Vùng trò chơi */
        .game-container {
            position: relative;
            width: 1280px;
            height: 700px;
            overflow: hidden;
            margin: 0 auto;
            border: 2px solid #000;
            background-color: #f0f0f0;
        }

        /* Dino */
        .dino {
            position: absolute;
            bottom: 0;
            left: 50px;
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .dino img{
            height: 100%;
            width: 100%;
        }

        /* Cactus */
        .cactus {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 30px;
            height: 50px;
            animation: moveCactus 2s linear infinite;
        }
        .cactus img{
            height: 100%;
            width: 100%;
        }

        @keyframes moveCactus {
            0% {
                right: -30px;
            }
            100% {
                right: 1280px;
            }
        }

        /* Hiệu ứng nhảy của Dino */
        @keyframes jumpAnimation {
            0% {
                bottom: 0;
            }
            50% {
                bottom: 150px;
            }
            100% {
                bottom: 0;
            }
        }

        .dino.jump {
            animation: jumpAnimation 0.5s ease-out;
        }

        /* Điểm số */
        .score {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .restart-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.restart-btn:hover {
    background-color: #0056b3;
}
    </style>

<div class="game-container">
    <div class="score" id="score">Score: 0</div>
    <div class="dino" id="dino"><img src="Assets/images/kitty.png" alt=""></div>
    <div class="cactus" id="cactus"><img src="Assets/images/cactus.png" alt=""></div>
    <button id="restart" class="restart-btn" style="display: none;">Chơi lại</button>
</div>
    <script>
       // Lấy các phần tử HTML
const dino = document.getElementById("dino");
const cactus = document.getElementById("cactus");
const scoreDisplay = document.getElementById("score");
const restartBtn = document.getElementById("restart");

let score = 0;
let isGameOver = false;
let scoreInterval;

// Thêm sự kiện nhấn phím để Dino nhảy
document.addEventListener("keydown", function (event) {
    if (event.code === "Space" && !dino.classList.contains("jump")) {
        jump();
    }
});

// Hàm xử lý Dino nhảy
function jump() {
    if (!isGameOver) {
        dino.classList.add("jump");
        setTimeout(() => {
            dino.classList.remove("jump");
        }, 500); // Thời gian nhảy
    }
}

// Tăng điểm số
function startScore() {
    score = 0; // Đặt lại điểm
    scoreInterval = setInterval(() => {
        if (!isGameOver) {
            score++;
            scoreDisplay.textContent = `Score: ${score}`;
        }
    }, 100);
}

// Kiểm tra va chạm
function checkCollision() {
    const dinoRect = dino.getBoundingClientRect();
    const cactusRect = cactus.getBoundingClientRect();

    if (
        dinoRect.right > cactusRect.left &&
        dinoRect.left < cactusRect.right &&
        dinoRect.bottom > cactusRect.top
    ) {
        gameOver();
    }
}

// Xử lý khi người chơi thua
function gameOver() {
    isGameOver = true;
    clearInterval(scoreInterval); // Dừng điểm số
    cactus.style.animation = "none"; // Dừng chướng ngại vật
    restartBtn.style.display = "block"; // Hiển thị nút chơi lại
}

// Thiết lập lại trạng thái trò chơi
function resetGame() {
    isGameOver = false;

    // Khôi phục hoạt động chướng ngại vật
    cactus.style.animation = "moveCactus 2s linear infinite";

    // Ẩn nút chơi lại
    restartBtn.style.display = "none";

    // Bắt đầu lại tính điểm
    startScore();
}

// Thêm sự kiện cho nút "Chơi lại"
restartBtn.addEventListener("click", resetGame);

// Bắt đầu trò chơi ban đầu
startScore();

// Kiểm tra va chạm liên tục
setInterval(() => {
    if (!isGameOver) checkCollision();
}, 10);

    </script>
<?php include_once VIEW . "Admin/base/footer.php" ?>

