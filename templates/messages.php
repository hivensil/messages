<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 23:10
 */
?>
<div class="messages-panel">
    <a class="btn btn-primary float-right" href="/messages/create">Добавить сообщение</a>
</div>
<div class="messages-container">
    <?PHP foreach($data['messages'] as $row) { ?>
        <a class="message-link" href="/messages/fullview?id=<?PHP echo $row->id; ?>">
            <div class="card">
                <div class="card-header">
                    <?PHP print($row->title);?>
                </div>
                <div class="card-body">
                    <?PHP print($row->summary_content);?>
                </div>
            </div>
        </a>
    <?PHP } ?>
    <nav aria-label="Pager" class="Pager">
        <ul class="pagination">
            <li class="page-item <?PHP if ($data['pagerData']['currentPageNum'] ==1 ) echo 'disabled'?>">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            <?PHP for($i=1;$i<$data['pagerData']['pagesCount'];$i++) { ?>
                <li class="page-item <?PHP if ($data['pagerData']['currentPageNum'] ==$i ) echo 'disabled'?>"><a class="page-link" href="/messages/view?page=<?PHP echo $i?>"><?PHP echo $i?></a></li>
            <?PHP } ?>
            <li class="page-item <?PHP if ($data['pagerData']['currentPageNum'] == $data['pagerData']['pagesCount']) echo 'disabled'?>">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>


</div>