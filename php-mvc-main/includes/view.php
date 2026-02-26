<?php
declare(strict_types=1);

function renderView(string $template, array $data = []): void
{
    // บรรทัดนี้สำคัญมาก! เพื่อให้ตัวแปรอย่าง $eventName ใช้งานได้ในหน้า View
    extract($data); 
    include TEMPLATES_DIR . '/' . $template . '.php';
}