<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnamen Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        #participants-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
        }

        .participant {
            border: 1px solid #ccc;
            padding: 8px;
            margin: 5px;
            background-color: #fff;
        }

        #tournament-container {
            margin-top: 20px;
            position: relative;
        }

        .line {
            position: absolute;
            border-left: 2px solid #000;
            height: 60px;
            left: 50%;
            margin-left: -1px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Turnamen Generator</h2>

    <div class="form-group">
        <label for="participant-input">Tambah Peserta:</label>
        <input type="text" class="form-control" id="participant-input" placeholder="Nama Peserta">
        <button type="button" class="btn btn-primary mt-2" id="addParticipantBtn">Tambah</button>
    </div>

    <div id="participants-container"></div>

    <button type="button" class="btn btn-success mt-4" id="generateBracketBtn">Buat Bagan Turnamen</button>

    <div id="tournament-container" class="mt-4"></div>

    <h2 class="text-center mt-4">Data Peserta yang Diacak</h2>
    <table id="participantsTable" class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Peserta</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var participants = [];

        // Tambah peserta dari input
        $("#addParticipantBtn").on("click", function() {
            var participantName = $("#participant-input").val();
            if (participantName) {
                participants.push(participantName);
                renderParticipants();
                $("#participant-input").val('');
            }
        });

        // Render peserta
        function renderParticipants() {
            var participantsContainer = $("#participants-container");
            participantsContainer.empty();

            participants.forEach(function(participant) {
                var participantElement = $("<div class='participant'>" + participant + "</div>");
                participantsContainer.append(participantElement);
            });
        }

        // Buat bagan turnamen
        $("#generateBracketBtn").on("click", function() {
            if (participants.length < 2) {
                alert("Tambahkan setidaknya dua peserta untuk membuat bagan turnamen.");
                return;
            }

            renderBracket();
            renderParticipantsTable();
        });

        // Fungsi untuk menggambar bagan turnamen
        function renderBracket() {
            var tournamentContainer = $("#tournament-container");
            tournamentContainer.empty();

            // Hitung jumlah baris dan kolom
            var rows = Math.ceil(Math.log2(participants.length));
            var cols = participants.length;

            // Hitung lebar dan tinggi setiap sel
            var cellWidth = 200;
            var cellHeight = 60;

            // Gambar garis dan sel
            for (var row = 0; row < rows; row++) {
                for (var col = 0; col < cols; col++) {
                    var left = col * cellWidth + (cols - col - 1) * cellWidth / 2;
                    var top = row * cellHeight;
                    
                    var line = $("<div class='line'></div>");
                    line.css({
                        top: top,
                        left: left
                    });

                    tournamentContainer.append(line);

                    if (row === rows - 1) {
                        var participantIndex = col * Math.pow(2, row);
                        var participant = participants[participantIndex];
                        var participantElement = $("<div class='participant'>" + participant + "</div>");
                        participantElement.css({
                            top: top + cellHeight,
                            left: left - cellWidth / 2
                        });
                        tournamentContainer.append(participantElement);
                    }
                }

                cols /= 2;
            }
        }

        // Fungsi untuk mengacak array
        function shuffleArray(array) {
            for (var i = array.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Fungsi untuk mengacak data peserta dan menampilkan di tabel
        function renderParticipantsTable() {
            var table = $("#participantsTable").DataTable({
                destroy: true,
                data: shuffleArray(participants.map(function(participant, index) {
                    return [index + 1, participant];
                })),
                columns: [
                    { title: "No." },
                    { title: "Nama Peserta" }
                ]
            });
        }
    });
</script>

</body>
</html>
