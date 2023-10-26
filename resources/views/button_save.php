<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Button</title>
    <link rel="stylesheet" href="./css/button_save.css">
</head>
<body>
    <div>
        <button id="btn" class="custombtn">
            <p id="btnText">Submit</p>
            <div class="check-box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                    <path fill="transparent" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
            </div>
        </button>
    </div>
    <script type="text/javascript">
        const btn = document.querySelector("#btn");
        const btnText = document.querySelector("#btnText");

        btn.onclick = () => {
            btnText.innerHTML = "Thanks";
            btn.classList.add("active");
        };
    </script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Button</title>
    <link rel="stylesheet" href="./css/button_save.css">
</head>
<body>
    <div>
        <button id="btnsave" class="button-save" style="margin-left:80%; margin-bottom:20px">
            <p id="btnText" style="margin-top: 13px;">Save</p>
            <div class="check-box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                    <path fill="transparent" class="icon-svg-path" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
            </div>
        </button>
    </div>
    <script type="text/javascript">
        const btnsave = document.querySelector("#btnsave");
        const btnText = document.querySelector("#btnText");

        btnsave.onclick = () => {
            btnText.innerHTML = "Done !";
            btnsave.classList.add("active");
        };
    </script>
</body>
</html>