<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe - Film Version</title>
    <style>
        table {
            margin: 20px auto;
            border-collapse: collapse;
        }
        td {
            width: 150px;
            height: 150px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #000;
            cursor: pointer;
        }
        .selected {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <table>
        <?php
        // Örnek film bilgileri
        $films = [
            ["Film 1", "Film 2", "Film 3"],
            ["Film 4", "Film 5", "Film 6"],
            ["Film 7", "Film 8", "Film 9"]
        ];

        for ($i = 0; $i < 3; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 3; $j++): ?>
                    <td id="cell-<?php echo $i . '-' . $j; ?>" onclick="makeMove(<?php echo $i; ?>, <?php echo $j; ?>)">
                        <?php echo $films[$i][$j]; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

    <script>
        var currentPlayer = 'X';
        var board = [
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ];

        function makeMove(row, col) {
            var cell = document.getElementById('cell-' + row + '-' + col);
            if (!cell.classList.contains('selected')) {
                cell.classList.add('selected');
                cell.innerHTML += '<br>' + currentPlayer;
                board[row][col] = currentPlayer;

                if (checkWinner(currentPlayer)) {
                    alert(currentPlayer + ' kazandı!');
                }

                currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
            }
        }

        function checkWinner(player) {
            for (var i = 0; i < 3; i++) {
                if (board[i][0] === player && board[i][1] === player && board[i][2] === player) {
                    return true;
                }
                if (board[0][i] === player && board[1][i] === player && board[2][i] === player) {
                    return true;
                }
            }
            if (board[0][0] === player && board[1][1] === player && board[2][2] === player) {
                return true;
            }
            if (board[0][2] === player && board[1][1] === player && board[2][0] === player) {
                return true;
            }
            return false;
        }
    </script>
</body>
</html>
