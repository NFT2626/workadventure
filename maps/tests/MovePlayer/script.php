<!doctype html>
<html lang="en">
<head>
    <script src="<?php echo $_SERVER["FRONT_URL"] ?>/iframe_api.js"></script>
    <script>
        window.addEventListener('load', () => {
            //@ts-ignore
            WA.onInit().then(() => {
                console.log('After WA init');
                const movePlayerButton = document.getElementById('movePlayerButton');
                const randomChainedMovementButton = document.getElementById('randomChainedMovementButton');
                const xField = document.getElementById('x');
                const yField = document.getElementById('y');
                const speedField = document.getElementById('speed');

                randomChainedMovementButton.addEventListener('click', async () => {
                    try {
                        let pos;
                        pos = await WA.player.moveTo(100, 100, 10);
                        console.log(pos);
                        pos = await WA.player.moveTo(500, 100, 10);
                        console.log(pos);
                        pos = await WA.player.moveTo(500, 500, 10);
                        console.log(pos);
                        pos = await WA.player.moveTo(100, 500, 10);
                        console.log(pos);
                        pos = await WA.player.moveTo(100, 100, 10);
                        console.log(pos);
                    } catch (err) {
                        console.log('movement was stopped forcefully');
                    }
                });

                movePlayerButton.addEventListener('click', async () => {                    
                    const position = await WA.player.moveTo(
                        parseInt(xField.value),
                        parseInt(yField.value),
                        parseInt(speedField.value),
                    );
                    console.log(position);
                });
            });
        })
    </script>
</head>
<body>
X: <input type="text" id="x" value="496" /><br/>
Y: <input type="text" id="y" value="655" /><br/>
Speed: <input type="text" id="speed" value="20" /><br/>

<button id="movePlayerButton">Move Player</button>
<button id="randomChainedMovementButton">Do random chained movement</button>

</body>
</html>
