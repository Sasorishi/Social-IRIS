<?php
  include ('../header.php');
  include ('../nav.php');

  $resultats = $unControler->selectFriend($_SESSION['idUser']);
?>

<body>
  <div class="container mt-5">
    <div class="messaging">
        <div class="inbox_msg">
          <div class="inbox_people">
            <div class="headind_srch">
              <div class="recent_heading">
                <h4>Recent</h4>
              </div>
              <div class="srch_bar">
                <div class="stylish-input-group">
                  <input type="text" class="search-bar"  placeholder="Search" >
                  <span class="input-group-addon">
                  <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                  </span> </div>
              </div>
            </div>
            <div class="inbox_chat">
              <?php
                foreach($resultats as $unResultat)
                {
                  if($_GET['idUser'] == $unResultat['idUser'])
                  {
              ?>

              <a href="message.php?idUser=<?php echo $unResultat['idUser'] ?>">
                <div class="chat_list active_chat">
                  <div class="chat_people">
                    <div class="chat_img"> <img class="rounded-circle" src="<?php echo "../../public/folder/".$unResultat['folder']."/".$unResultat['imgUser'] ?>" alt="sunil"> </div>
                    <div class="chat_ib">
                      <h5><?php echo $unResultat['firstName'] ?><span class="chat_date">Dec 25</span></h5>
                      <p>Test, which is a new approach to have all solutions 
                        astrology under one roof.</p>
                    </div>
                  </div>
                </div>
              </a>

              <?php
                  }
                  else
                  {
              ?>

              <a href="message.php?idUser=<?php echo $unResultat['idUser'] ?>">
                <div class="chat_list">
                  <div class="chat_people">
                    <div class="chat_img"> <img class="rounded-circle" src="<?php echo "../../public/folder/".$unResultat['folder']."/".$unResultat['imgUser'] ?>" alt="sunil"> </div>
                    <div class="chat_ib">
                      <h5><?php echo $unResultat['firstName'] ?><span class="chat_date">Dec 25</span></h5>
                      <p>Test, which is a new approach to have all solutions
                        astrology under one roof.</p>
                    </div>
                  </div>
                </div>
              </a>

              <?php
                  }
                }
              ?>

            </div>
          </div>

            <div class="mesgs">
              <div class="msg_history">

              <?php
                $resultats2 = $unControler->displayMessage($_SESSION['idUser'], $_GET['idUser']);

                $idFriend = $_GET['idUser'] - 2;

                foreach($resultats2 as $unResultat2)
                {
                  if($unResultat2['iduser'] == 1)
                  {
              ?>
              <div class="outgoing_msg">
                <div class="sent_msg">
                  <p><?= $unResultat2['message'] ?></p>
                  <span class="time_date"> <?= $unResultat2['timemessage'] ?>    |    <?= date("l jS F Y", strtotime($unResultat2['datemessage'])) ?></span> </div>
              </div>
              <?php
                  }
              ?>

              <?php
                  if($unResultat2['iduser'] == 3)
                  {
              ?>
              <div class="incoming_msg">
                <div class="incoming_msg_img"> <img class="rounded-circle" src="<?php echo "../../public/folder/".$resultats[$idFriend]['folder']."/".$unResultat['imgUser'] ?>"> </div>
                <div class="received_msg">
                  <div class="received_withd_msg">
                    <p><?= $unResultat2['message'] ?></p>
                    <span class="time_date"> <?= $unResultat2['timemessage'] ?>    |    <?= date("l jS F Y", strtotime($unResultat2['datemessage'])) ?></span></div>
                </div>
              </div>
              <?php
                  }
                }
              ?>

            </div>

            <form method="post" action="">
              <div class="type_msg">
                <div class="input_msg_write">
                  <input type="text" class="write_msg" name="txtMessage" placeholder="Type a message" />
                  <button class="msg_send_btn" id="refresh-btn" name="txtMessage" type="button"><i class="fas fa-angle-right"></i></button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
</body>

<?php
  if(isset($_POST['txtMessage']))
  {
    $tableMessage['message'] = $_POST['txtMessage'];
    $tableMessage['dateMessage'] = date('Y-m-d');
    $tableMessage['timeMessage'] = date("H:i:s");
    $tableMessage['idUser'] = $_SESSION['idUser'];
    $tableMessage['idFriend'] = $_GET['idUser'];

    $unControler->setTable("message");
    $unResultat2 = $unControler->insert($tableMessage);

    header("Refresh:0");
  }
?>

<?php
  include ('../footer.php');
?>