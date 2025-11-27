<?php
// require_once('db-connect.php');
// session_start();

// Fetch all users
$sql = "SELECT username, level, last_active, is_active FROM users";
$result = $link->query($sql);
?>


    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; text-align: left; border-bottom: 1px solid #333; cursor: pointer; }
        th { background-color: #222; }
        .activeOn { color: #4caf50; font-weight: bold; }
        .inactiveOn { color: #f44336; }
        .sorted-asc::after { content: " ▲"; }
        .sorted-desc::after { content: " ▼"; }
    </style>
    <script>
        // Refresh every 60 seconds
        // setTimeout(() => location.reload(), 60000);

        // Table sorting
        document.addEventListener("DOMContentLoaded", () => {
            const table = document.querySelector("table");
            const headers = table.querySelectorAll("th");
            let sortDirection = 1;
            let currentIndex = -1;

            headers.forEach((header, index) => {
                header.addEventListener("click", () => {
                    if (index === currentIndex) {
                        sortDirection *= -1; // toggle direction
                    } else {
                        sortDirection = 1;
                        currentIndex = index;
                    }

                    headers.forEach(h => h.classList.remove("sorted-asc", "sorted-desc"));
                    header.classList.add(sortDirection === 1 ? "sorted-asc" : "sorted-desc");

                    const rows = Array.from(table.querySelectorAll("tbody tr"));
                    rows.sort((a, b) => {
                        const aText = a.children[index].textContent.trim();
                        const bText = b.children[index].textContent.trim();

                        const aNum = parseFloat(aText);
                        const bNum = parseFloat(bText);

                        if (!isNaN(aNum) && !isNaN(bNum)) {
                            return sortDirection * (aNum - bNum);
                        }

                        return sortDirection * aText.localeCompare(bText);
                    });

                    const tbody = table.querySelector("tbody");
                    rows.forEach(row => tbody.appendChild(row));
                });
            });
        });
    </script>

<h1>All Users</h1>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Level</th>
            <th>Last Active</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo (int)$row['level']; ?></td>
                <td><?php echo date("M d, H:i", strtotime($row['last_active'])); ?></td>
                <td class="<?php echo $row['is_active'] ? 'activeOn' : 'inactiveOn'; ?>">
                    <?php echo $row['is_active'] ? '🟢 Active' : '🔴 Inactive'; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>


