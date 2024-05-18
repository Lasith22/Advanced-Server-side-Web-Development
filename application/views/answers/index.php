<?php $this->load->view('templates/header'); ?>

<div class="container mt-5">
    <div class="question-box">
        <h2><?php echo $question['question']; ?></h2>
        <div class="actions">
            <button class="btn btn-outline-primary">
                <i class="fa fa-thumbs-up"></i> 20
            </button>
            <button class="btn btn-outline-secondary">
                <i class="fa fa-thumbs-down"></i> 10
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#answerModal">
                Answer
            </button>
        </div>
    </div>

    <?php foreach ($answers as $answer) : ?>
        <div class="answer-box">
            <p><?php echo $answer['answer']; ?></p>
            <div class="actions">
                <button class="btn btn-outline-primary">
                    <i class="fa fa-thumbs-up"></i> 10
                </button>
                <button class="btn btn-outline-secondary">
                    <i class="fa fa-thumbs-down"></i> 10
                </button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Answer Modal -->
<div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="answerModalLabel">Answer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('answers/submit'); ?>" method="post">
                    <input type="hidden" name="question_id" value="<?php echo $question['id']; ?>">
                    <div class="form-group">
                        <label for="answer">Type Your Answer Here</label>
                        <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Answer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>