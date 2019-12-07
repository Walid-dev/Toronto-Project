<div id="messageTruckSection" class="cyberTruck_alert_box <?= $_SESSION['msg_type'] ?>">
    <img class="" src="public/images/cyber-truck.gif" width="120px" alt="">
    <div class="align-self-start" class="truck_msg_box">
        <div class="truck_msg"><?= $_SESSION['message'];
                                unset($_SESSION['message']); ?></div>
    </div>
</div>