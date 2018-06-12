#!/usr/bin/perl
# My uploader!
use strict;
use warnings;
use CGI;
my $cgi = CGI->new;
print $cgi->header();
print "<body style=\"background: #caccf7 url('https://i.imgur.com/Syv2IVk.png');padding: 30px;\">";
print "<p style='color:red'>No BUG Q_____Q</p>";
print "<br>";
print "<pre>";
if( $cgi->upload('file') ) {
        my $file = $cgi->param('file');
        while(<$file>) {
                print "$_";
        }
}
print "</pre>";
