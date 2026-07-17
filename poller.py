import requests
import subprocess
import time
import json
import os

TOKEN = "8306869095:AAE7xkGIU5BaLTIcxJVoCR2e0z0RXnNYhNI"
URL = f"https://api.telegram.org/bot{TOKEN}/getUpdates"
PHP_SCRIPT = "index.php"

def run_php(update):
    try:
        process = subprocess.Popen(
            ['php', PHP_SCRIPT],
            stdin=subprocess.PIPE,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE,
            text=True
        )
        stdout, stderr = process.communicate(input=json.dumps(update))
        if stderr:
            with open("bot_error.log", "a") as f:
                f.write(f"PHP Error: {stderr}\n")
    except Exception as e:
        with open("bot_error.log", "a") as f:
            f.write(f"Execution Error: {str(e)}\n")

def main():
    offset = 0
    # مسح التحديثات القديمة عند البدء
    requests.get(f"https://api.telegram.org/bot{TOKEN}/getUpdates?offset=-1")
    
    print("Bot Poller Started...")
    while True:
        try:
            response = requests.get(f"{URL}?offset={offset}&timeout=30")
            updates = response.json()
            
            if updates.get("ok") and updates.get("result"):
                for update in updates["result"]:
                    print(f"New update: {update.get('update_id')}")
                    run_php(update)
                    offset = update["update_id"] + 1
            
        except Exception as e:
            print(f"Polling Error: {e}")
            time.sleep(5)

if __name__ == "__main__":
    main()
