<?php

    declare(strict_types=1);

    namespace Business;
    use Data\CommentDAO;
    use Entities\Comment;

    $commentDAO = new CommentDAO();

    class CommentService {
        public function createComment(string $comment, int $order_id): ?int {
            global $commentDAO;
            return $commentDAO->create($comment, $order_id);
        }
        public function getComment(int $id): ?Comment {
            global $commentDAO;
            return $commentDAO->getById($id);
        }
        public function updateComment(int $id, string $comment, ?int $order_id): ?Comment {
            global $commentDAO;
            return $commentDAO->update($id, $comment, $order_id);
        }
    }