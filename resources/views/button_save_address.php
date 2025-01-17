<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Button</title>
    <link rel="stylesheet" href="./css/button_save_address.css">
</head>
<body>
    <div>
        <button id="btnsaveAdd" class="button-save-add" style="margin-left:70%; margin-bottom:20px">
            <p id="btnTextAdd" style="margin-top: 13px;">Save</p>
            <div class="check-box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                    <path fill="transparent" class="icon-svg-path" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
            </div>
        </button>
    </div>
    <script type="text/javascript">
        const btnsaveAdd = document.querySelector("#btnsaveAdd");
        const btnTextAdd = document.querySelector("#btnTextAdd");

        btnsaveAdd.onclick = () => {
            btnTextAdd.innerHTML = "Done !";
            btnsaveAdd.classList.add("active");
            
            btnsaveAdd.addEventListener('webkitTransitionEnd', function ( event ) {
                window.location.href="/user-profile";
            });
        }
    </script>
</body>
</html>