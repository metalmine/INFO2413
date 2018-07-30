<?php
$stmt = $pdo->query('SELECT DISTINCT RUNS.runId, USERS.userId, username, time, submitedAt FROM USERS JOIN USERS_RUNS ON USERS.userId = USERS_RUNS.userId JOIN RUNS ON RUNS.runId = USERS_RUNS.runId ORDER BY runId DESC LIMIT 10');
foreach ($stmt as $row) {
    echo "<tr> <th> " . $row['runId'] . "</th> <td>", $row['username'] . "</td> <td><a href=\""$row['youtube'] . ">", $row['time'] . "</a></td> <td>", $row['submitedAt'] . "</td> </tr>";
}