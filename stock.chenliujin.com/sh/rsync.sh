#!/bin/bash

rsync -avz ../Application 	/data/httpd/htdocs/www.chenliujin.com/
rsync -avz ../Common 		/data/httpd/htdocs/www.chenliujin.com/
rsync -avz ../model 		/data/httpd/htdocs/www.chenliujin.com/
