<?php foreach ($fields as $field): ?>
    <div class="form-group">
        <label for="<?= $field['name'] ?>"><?= $field['label'] ?>:</label>
        <input 
            type="<?= $field['type'] ?>" 
            name="<?= $field['name'] ?>" 
            id="<?= $field['name'] ?>" 
            value="<?= htmlspecialchars($_POST[$field['name']] ?? '') ?>" 
        >
        <?php if (!empty($errors[$field['name']])): ?>
            <span class="error"><?= $errors[$field['name']] ?></span>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<button type="submit">Submit</button>
