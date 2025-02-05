<?php 
	include(_LAYOUT.'/header.php');
    $ticket_id   = substr(($_SERVER['REQUEST_URI']), 13);

    //Innitiate the Ticket instance
    $user_ticket = new Ticket;
    $user_ticket = $user_ticket->specif_ticket($ticket_id);

    //Initiate the conversation instance
    $style		 = new Conversation;
    $messages    = new Conversation;
    $messages    = $messages->chat($ticket_id);

    //fetch ticket details
    foreach($user_ticket as $_ticket){
        $ticket  = $_ticket;
    }

    
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">
            <div class='row glass lg-width'>
                <div class="col-sm-1 user-box">
                    <center>
                        <img src="<?=$ticket['photo']?>" style="margin:auto;" class="rounded-circle" alt="">
                        <h6><?=$ticket['username']?></h6>
                    </center>
                </div>
                <div class="col">
                    <h6>
                        <span class="text-bold">Update :</span> 
                        <span class="text-secondary"><?=$ticket['update']?> days</span>
                    </h6>
                    <h6>
                        <span class="text-bold">Subject :</span> 
                        <span class="text-secondary"><?=$ticket['subject']?></span>
                    </h6>
                    <h6>
                        <span class="text-bold">Message :</span> 
                        <span class="text-secondary"><?=$ticket['content']?></span>
                    </h6>
                    <span id="dots"></span>
                    <span id="more" style="display: none;">
                        <h6><span class="text-bold">Branch :</span> <span class="text-secondary"><?=$ticket['branch']?></span></h6>
                        <h6><span class="text-bold">organization :</span> <span class="text-secondary"><?=$ticket['organization']?></span></h6>
                        <h6><span class="text-bold">Status :</span> <span class="text-secondary"><?=$ticket['status']?></span></h6>
                        <h6><span class="text-bold">Opened :</span> <span class="text-secondary"><?=$ticket['time']?></span></h6>
                    </span>
                    <p onclick="readMore()" class="text-right" id="readmore">Expand <i class="fas fa-plus-circle"></i></p>
                </div>
            </div>
            <div class='space'></div>

            <!-- ticket conversation -->
            <div class='row glass lg-width overflow h-30' id="chat" onload="gotoBottom()">
                <div class='col' id="txtHint">
                    <?php include(_LAYOUT.'/chat-ticket.php'); ?>
                </div>
            </div>            
            <!-- ticket conversation -->
            
            <div class="space"></div>
            <!-- message sent success --
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <!-- message sent success --
            <div class='row glass lg-width''>
                <div class="col">
                    <form id="conversation" name="form1" method="POST">
                    <div class="input-group">
                        <input id="ticket" name="ticket" value="< ?=substr(($_SERVER['REQUEST_URI']), 13);?>" hidden>
                        <input name="message" id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." required>
                        <span class="input-group-btn"> &nbsp;
                            <button class="btn btn-primary btn-sm" id="butsave">Send</button>
                        </span>
                    </div>
                </div>
            </div>

			<!-- floating buttons -->
			<a href="#" class="float" id="menu-share">
				<i class="fa fa-share my-float"></i>
			</a>
			<ul class="ul">
				<li class="li" title="transfer ticket"><a class="a" href="#">
					<i class="fa fa-upload my-float"></i>
				</a></li>
				<li class="li" title="assign ticket"><a class="a" href="#">
					<i class="fa fa-user my-float"></i>
				</a></li>
				<li class="li" title="Reply"><a class="a" data-toggle="modal" data-target="#replyTicketModal" href="#">
					<i class="fa fa-pencil my-float"></i>
				</a></li>
			</ul>
			
		</section>
		<script src="/assets/js/custom.js"></script>
        <script>
            function refreshChat(){
                showChats('<?=$ticket_id?>');
            }

            refreshChat();
			setInterval(function(){
				refreshChat() // this will run after every 5 seconds
			}, 3000);
        </script>
        
		<!-- modals -->		
		<?php 
			include(_LAYOUT.'/create-ticket.php'); 
			include(_LAYOUT.'/reply-ticket.php');
		?>
		<!-- //modals -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>