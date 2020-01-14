

<?php if(preg_match('/\Ahttps?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?\Z/', 'http://'.$_POST['domain'])) // URL auf validität überprüfen.
{
    $whois=array(); // Array initialisieren. Es folgen Deklarationen des mehrdimensionalem Arrays.
    $whois['.de']['server']='whois.denic.de';
    $whois['.de']['string']='Status:      free';
    $whois['.com']['server']='whois.crsnic.net';
    $whois['.com']['string']='No match for';
    $whois['.net']['server']='whois.crsnic.net';
    $whois['.net']['string']='No match for';
    $whois['.org']['server']='whois.publicinterestregistry.net';
    $whois['.org']['string']='NOT FOUND';
    $whois['.info']['server']='whois.afilias.net';
    $whois['.info']['string']='NOT FOUND';
    $whois['.biz']['server']='whois.nic.biz';
    $whois['.biz']['string']='Not found';
    $whois['.ag']['server']='whois.nic.ag';
    $whois['.ag']['string']='NOT FOUND';
    $whois['.am']['server']='whois.nic.am';
    $whois['.am']['string']='No match';
    $whois['.as']['server']='whois.nic.as';
    $whois['.as']['string']='Domain Not Found';
    $whois['.at']['server']='whois.nic.at';
    $whois['.at']['string']='nothing found';
    $whois['.be']['server']='whois.dns.be';
    $whois['.be']['string']='Status:      FREE';
    $whois['.cd']['server']='whois.cd';
    $whois['.cd']['string']='No match';
    $whois['.ch']['server']='whois.nic.ch';
    $whois['.ch']['string']='not have an entry';
    $whois['.cx']['server']='whois.nic.cx';
    $whois['.cx']['string']='Status: Not Registered';
    $whois['.dk']['server']='whois.dk-hostmaster.dk';
    $whois['.dk']['string']='No entries found';
    $whois['.it']['server']='whois.nic.it';
    $whois['.it']['string']='Status: AVAILABLE';
    $whois['.li']['server']='whois.nic.li';
    $whois['.li']['string']='do not have an entry';
    $whois['.lu']['server']='whois.dns.lu';
    $whois['.lu']['string']='No such domain';
    $whois['.nu']['server']='whois.nic.nu';
    $whois['.nu']['string']='NO MATCH for';
    $whois['.ru']['server']='whois.ripn.net';
    $whois['.ru']['string']='No entries found';
    $whois['.uk.com']['server']='whois.centralnic.com';
    $whois['.uk.com']['string']='No match for';
    $whois['.eu.com']['server']='whois.centralnic.com';
    $whois['.eu.com']['string']='No match';
    $whois['.ws']['server']='whois.nic.ws';
    $whois['.ws']['string']='No match for';

    $domain=str_replace('www.', '', $_POST['domain']); // Solche Dinge sind Detailssache (..)  Letztlich muss die Anfrage an den WHOIS-Server ohne http::// , www. usw. stattfinden. -> Nur Domainname und Domainendung.

    if(get_magic_quotes_gpc==0)
    {
        $domain=addslashes($domain);
    }

// Verbindung zum whois server aufbauen / Status der Domain erfragen.

    $check=fsockopen($whois[$_POST['tld']]['server'], 43);
    fputs($check, $domain.$_POST['tld']."\r\n");
    while(!feof($check))
    {
        $report=$report.fgets($check, 128);
    }
    fclose($check);

    if(ereg($whois[$_POST['tld']]['string'], $report)) // Was soll geschehen, wenn domain noch frei ist?
    {
        print('domain frei.');
    }
    else // Was, wenn nicht?
    {
        print('domain nicht frei.');
    }
}
?>