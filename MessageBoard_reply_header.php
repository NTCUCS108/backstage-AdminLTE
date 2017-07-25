<ol class="breadcrumb">
                    <li><a href="starter.php"><i class="fa fa-edit"></i>管理者後台</a></li>
                    <li class="active"><a href="http://ntcucsintern.ddns.net/backstage-AdminLTE/MessageBoard.php">留言板</a></li>
					<li class="active"><a href='http://ntcucsintern.ddns.net/backstage-AdminLTE/MessageBoard_detail.php?id=<?php echo "$rs[guestID]";?>'>第<?php echo "$rs[guestID]";?></a>則留言</li>
					<li class="active"><a href='http://ntcucsintern.ddns.net/backstage-AdminLTE/Message_reply.php?id=<?php echo "$rs[guestID]";?>'>回覆</a></li>
                </ol>