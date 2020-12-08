# Installation

1. Clone the repository
1. Install GIT, Composer on server if not there.
1. `composer up` to download vendor files

# Docker
1. `docker-compose up -- build` on first time
1. Accessible at http://0.0.0.0:8083/

# Running Tests
1. SSH in with `docker exec -it bflex-calculator_bflex-devbox_1 /bin/bash`
1. Go to `/var/www/html` and `./vendor/bin/phpunit tests`