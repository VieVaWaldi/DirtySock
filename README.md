## CVE-2019-7304 DirtySock

### Ressourcen:

Code mit guten Comments:
https://github.com/initstring/dirty_sock/blob/master/dirty_sockv1.py

Erklaerung und Code
https://www.exploit-db.com/exploits/46362 

https://initblog.com/2019/dirty-sock/

snapd source code: https://github.com/snapcore/snapd (HACKING.md zum debuggen)

snapd API doc: https://github.com/snapcore/snapd/wiki/REST-API

go branch: https://stackoverflow.com/questions/42761820/how-to-get-another-branch-instead-of-default-branch-with-go-get

### Debug:

https://github.com/go-delve/delve/blob/master/Documentation/installation/linux/install.md

https://blog.gopheracademy.com/advent-2015/debugging-with-delve/

$ dlv debug github.com/snapcore/snapd/cmd/snapd

$ break ucrednet.go:38

$ continue

