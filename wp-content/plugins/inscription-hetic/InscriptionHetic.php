<?php
class InscriptionHetic {
    private $notif;
    private $render;
    private $submit;
    private $role;

    public function __construct(string|array $atts) {
        $this->inscription($this->defaults_attributes($atts));
    }

    public function defaults_attributes(string|array $atts): array {
        return shortcode_atts([
            'role' => "editor",
            'submit' => "S'inscrire",
            'render' => ""
        ], $atts);
    }

    public function inscription(array $attributes): void {
        $this->notif = "";
        $this->role = $attributes['role'];
        $this->submit = $attributes['submit'];
        $this->render = $attributes['render'];

        if (isset($_POST['inscription'])) {
            if (isset($_POST['email']) && isset($_POST['login']) && isset($_POST['password'])) {
                wp_insert_user([
                    'user_pass' => $_POST['password'],
                    'user_login' => $_POST['login'],
                    'user_email' => $_POST['email'],
                    'role' => $this->role
                ]);
                $this->notif = "Validé !";
            }
            else {
                $this->notif = "Champs";
            }
        }
    }

    public function render(): bool|string {
        ob_start();
?>
        <div class="inscription_notif"><?= $this->notif ?></div>
<?php
        if ($this->render == "form") :
?>
        <form method="post">
            <label for="login">Login</label><br>
            <input type="text" id="login" name="login"><br><br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="<?= $this->submit ?>" name="inscription">
        </form>
<?php
        endif;
        return ob_get_clean();
    }
}
?>