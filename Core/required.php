<?php
// Global Requirement
    require_once(CONFIG);
    require_once(SESSION);
    require_once(ROUTES);

// control requirements
    require_once(Ticket.'/ticket.php');
    require_once(Department.'/department.php');
    require_once(Branch.'/branch.php');
    require_once(Chat.'/ticket.php');
    require_once(User.'/staff.php');
    require_once(Mail.'/smtp.php');
    require_once(Notifier.'/notification.php');

?>