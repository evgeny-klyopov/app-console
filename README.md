# app-console

```bash
composer require alva/app-console
```

## How use?
1. Copy file src/bin/mt in your project.
2. Set constants PATH_COMMANDS, NAMESPACE_COMMANDS, PATH_HELPERS, NAMESPACE_HELPERS for helpers and commands in file mt.
3. By analogy we create commands and helpers.
4. Call
```bash
./mt your-command-alias
```
5. For debug, set last arguments. Count letter v - debug level. Example:
```bash
./mt example-test vvv
```
write message, on debug level 3 (vvv)
```bash
$this->debug('Debug Level 3', 3);
```


## Как использовать?
1. Копируем файл src/bin/mt в корень проекта.
2. Прописываем в данном файле папки и неймспейсы для комманд и хэлперов, в константы PATH_COMMANDS, NAMESPACE_COMMANDS, PATH_HELPERS, NAMESPACE_HELPERS.
3. По аналогии создаем команды и хэлперы.
4. Вызов
```bash
./mt алиас-вашей-команды
```
5. Для дебага, устанавливается последний аргумент. Количество букв v - уровень дебага. Например:
```bash
./mt example-test vvv
```
при установки уровня дебага равно 3 (vvv) будет выведено сообщение
```bash
$this->debug('Debug Level 3', 3);
```
