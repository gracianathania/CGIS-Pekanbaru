<style>
    body {
        font-family: Arial, sans-serif;
    }

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
        border-radius: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .review-section,
    .comment-section {
        margin-bottom: 20px;
    }

    .review-section h2,
    .comment-section h2 {
        margin-bottom: 10px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 30px;
        color: #ddd;
        cursor: pointer;
    }

    .rating input:checked~label,
    .rating input:hover~label {
        color: #f5b301;
    }

    .submit-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }
</style>

<!-- Trigger/Open The Modal -->
<button id="openModalBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="review-section">
            <h2>Rating</h2>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1">&#9733;</label>
            </div>
        </div>
        <div class="comment-section">
            <h2>Ulasan</h2>
            <textarea id="comment" rows="4" style="width:100%" placeholder="Berikan Ulasanmu Disini..."></textarea>
        </div>
        <button class="submit-btn">Submit</button>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("openModalBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review = $_POST['review'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
}
?>