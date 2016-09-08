#!/bin/bash
RESTARTM="/etc/init.d/mysql restart"
MYSQLD="mysqld"
$PGREP ${MYSQLD}
if [ $? -ne 0 ]; then
$RESTARTM
fi