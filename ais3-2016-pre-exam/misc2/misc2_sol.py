import os
import subprocess

index = 0

while True:
    archive = str(index) + '.7z'
    key_filename = str(index) + '.key'
    with open(archive, 'rb') as old_archive:
        content = old_archive.read()
        content = b'7z' + content[2:]
        archive = str(index) + '_z.7z'
        with open(archive, 'wb') as f:
            f.write(content)

        key = None
        with open(key_filename, 'r') as f:
            key = f.read().strip()
        subprocess.call('7z e ' + archive + ' -otemp' + ' -p' + key + ' -y',shell=True)

        index += 1
        os.rename("./temp/secret.txt", "./" + str(index) + ".key")

        file_list = os.listdir("./temp")
        assert len(file_list) == 1

        os.rename("./temp/" + file_list[0], "./" + str(index) + ".7z")
        pass

