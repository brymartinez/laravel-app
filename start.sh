declare -i term_width=80
h1() {
    declare border padding text
    border='\e[1;34m'"$(printf '=%.0s' $(seq 1 "$term_width"))"'\e[0m'
    padding="$(printf ' %.0s' $(seq 1 $(((term_width - $(wc -m <<<"$*")) / 2))))"
    text="\\e[1m$*\\e[0m"
    echo -e "$border"
    echo -e "${padding}${text}${padding}"
    echo -e "$border"
}

h2() {
    printf '\e[1;33m==>\e[37;1m %s\e[0m\n' "$*"
}

logger() {
    fold -w $((term_width - 9)) -s | sed -n '
    /^\x1b\[[0-9;]*m/{ # match any line beginning with colorized text
        s/Error:/  \0/ # pads line so its length matches others
        p              # any lines containing color
        b              # branch to end
    }
    s/.*/         \0/p # pads all other lines with 9 spaces
    '
}

h1 "Step 1/5: Starting Docker Configuration"
docker-compose up -d
h1 "Step 2/5: Updating Composer inside Docker PHP Container"
docker-compose exec app composer update --no-scripts
h1 "Step 3/5: Recreating app key"
docker-compose exec app php artisan key:generate
h1 "Step 4/5: Migrating tables"
docker-compose exec app php artisan migrate
h1 "Step 5/5: Attempting to open a new browser window. If this fails, please go to http://localhost on your browser to open the app."
#!/bin/bash
if which xdg-open > /dev/null
then
  xdg-open http://localhost &
elif which gnome-open > /dev/null
then
  gnome-open http://localhost &
fi
h1 "Docker configuration started. Happy coding!"