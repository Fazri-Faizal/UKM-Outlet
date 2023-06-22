<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
<image id="pic" src="/img/3d/1.png">
<td> <input type="range" name="height" id="heightId" min = "1" max = "25" value = "15" oninput="myFunction()" ></td><td><output id="outputId" >15</output></td>
<script>
    
   function myFunction() {
    var num=document.getElementById("heightId").value;
    var num =parseInt(num);
    if(num==1){
        document.getElementById("pic").src = "/img/3d/1.png";
    }
    if(num==2){
        document.getElementById("pic").src = "/img/3d/2.png";
    }
    if(num==3){
        document.getElementById("pic").src = "/img/3d/3.png";
    }
    if(num==4){
        document.getElementById("pic").src = "/img/3d/4.png";
    }
    if(num==5){
        document.getElementById("pic").src = "/img/3d/5.png";
    }
    if(num==6){
        document.getElementById("pic").src = "/img/3d/6.png";
    }

    if(num==8){
        document.getElementById("pic").src = "/img/3d/8.png";
    }
    if(num==9){
        document.getElementById("pic").src = "/img/3d/9.png";
    }
    if(num==10){
        document.getElementById("pic").src = "/img/3d/10.png";
    }
    if(num==11){
        document.getElementById("pic").src = "/img/3d/11.png";
    }
    if(num==12){
        document.getElementById("pic").src = "/img/3d/12.png";
    }
    if(num==13){
        document.getElementById("pic").src = "/img/3d/13.png";
    }
    if(num==14){
        document.getElementById("pic").src = "/img/3d/14.png";
    }
    if(num==15){
        document.getElementById("pic").src = "/img/3d/15.png";
    }
    if(num==16){
        document.getElementById("pic").src = "/img/3d/16.png";
    }
    if(num==17){
        document.getElementById("pic").src = "/img/3d/17.png";
    }
    if(num==18){
        document.getElementById("pic").src = "/img/3d/18.png";
    }
    if(num==19){
        document.getElementById("pic").src = "/img/3d/19.png";
    }
    if(num==20){
        document.getElementById("pic").src = "/img/3d/20.png";
    }
    if(num==21){
        document.getElementById("pic").src = "/img/3d/21.png";
    }
    if(num==22){
        document.getElementById("pic").src = "/img/3d/22.png";
    }
    if(num==23){
        document.getElementById("pic").src = "/img/3d/23.png";
    }
    if(num==24){
        document.getElementById("pic").src = "/img/3d/24.png";
    }
    if(num==25){
        document.getElementById("pic").src = "/img/3d/25.png";
    }
}
</script>
</body>
</html>
<!-- <!DOCTYPE html>
<html>
    <head>
    <img src="/img/3d/1.png">
        <style>
            h1 {
                color:Green;
            }
            div.scroll {
                margin:4px, 4px;
                padding:4px;
                width: 700px;
                height: 500px;
                overflow-y: hidden;
                overflow-x: auto;
                text-align:justify;
            }
        </style>
    </head>
    <body>
        <center>
        <h1></h1>
        <div class="scroll">
        <img src="/img/3d/1.png">
        </div>
        </center>
    </body>
</html>                    -->