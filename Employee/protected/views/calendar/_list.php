<?php
/**
 * Custom view file for listing Calendar Entries.
 *
 * @package EmployeeInformationSystem
 * @subpackage Calendar
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
?>

<?php if ($index == 0) : ?>
<th class="days">Day</th>
<th class="author">Author</th>
<th>Details</th>
<?php endif; ?>

<tr>
    <td><?php echo date('j', strtotime($data['date'])); ?></td>
    <td><?php echo $data['author']; ?></td>
    <td><?php echo $data['details']; ?></td>
</tr>