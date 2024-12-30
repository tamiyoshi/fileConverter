<?php

require 'vendor/autoload.php'; // Composerのオートローダーを読み込む

// コマンドライン引数を取得
$command = $argv[1] ?? null;
$input = $argv[2] ?? null;
$output = $argv[3] ?? null;

// コマンドを処理
switch ($command) {
    case 'convert':
        if ($input && $output) {
            // 変換処理をここに実装
            echo "$input から $output に変換中\n";
            // 例: ファイルの内容を読み込んで変換する
            $content = file_get_contents($input);
            
            // Parsedownを使用してマークダウンをHTMLに変換
            $parsedown = new Parsedown();
            $htmlContent = $parsedown->text($content);
            
            // 変換されたHTMLを出力ファイルに書き込む
            file_put_contents($output, $htmlContent);
            echo "変換完了\n";
        } else {
            echo "入力ファイルと出力ファイルを指定してください\n";
        }
        break;
    
    default:
        echo "不明なコマンド: $command\n";
        break;
}

?>
