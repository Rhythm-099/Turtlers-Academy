<link rel="stylesheet" href="../../public/assets/css/quiz.css">

<h2>Leaderboard</h2>

<?php if(mysqli_num_rows($leaders)===0): ?>
<p>No scores yet.</p>
<?php else: ?>
<table>
    <tr>
        <th>Rank</th>
        <th>Student</th>
        <th>Best %</th>
    </tr>
    <?php $i=1; while($row=mysqli_fetch_assoc($leaders)): ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= $row['best'] ?>%</td>
    </tr>
    <?php $i++; endwhile; ?>
</table>
<?php endif; ?>
